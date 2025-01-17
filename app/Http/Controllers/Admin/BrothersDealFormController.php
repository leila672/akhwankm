<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBrothersDealFormRequest;
use App\Http\Requests\StoreBrothersDealFormRequest;
use App\Http\Requests\UpdateBrothersDealFormRequest;
use App\Models\ApprovementForm;
use App\Models\BigBrother;
use App\Models\BrothersDealForm;
use App\Models\SmallBrother;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; 
use Alert;

class BrothersDealFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('brothers_deal_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForms = BrothersDealForm::with(['big_brother', 'small_brother', 'approvment_form', 'specialist'])->get();

        return view('admin.brothersDealForms.index', compact('brothersDealForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('brothers_deal_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id','small_brother_id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approvment_forms = ApprovementForm::pluck('approved', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::where('user_type','staff')->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.brothersDealForms.create', compact('big_brothers', 'small_brothers', 'approvment_forms', 'specialists'));
    }

    public function store(StoreBrothersDealFormRequest $request)
    {
        $validated_request = $request->all();
        $bigBrother = BigBrother::findOrfail($request->big_brother_id);
        $approvmentform = ApprovementForm::where('big_brother_id',$request->big_brother_id)->orderBy('created_at','desc')->first();

        if($approvmentform){ 
            $validated_request['approvment_form_id'] = $approvmentform->id;
        }else{ 
            Alert::error('لم يتم الأضافة','قم بأضافة أستمارة توصية أولا');
            return redirect()->route('admin.brothers-deal-forms.index');
        }
        
        if($bigBrother->specialist_id != null){
            $validated_request['specialist_id'] = $bigBrother->specialist_id;
        }else{
            Alert::error('لم يتم الأضافة','برجاء أضافة مشرف للأخ الأكبر');
            return redirect()->route('admin.brothers-deal-forms.index');
        }

        if($bigBrother->small_brother_id != null){
            $validated_request['small_brother_id'] = $bigBrother->small_brother_id;
        }else{
            Alert::error('لم يتم الأضافة','لا يتم المأخاة للأخ الأكبر بعد');
            return redirect()->route('admin.brothers-deal-forms.index');
        }

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        $brothersDealForm = BrothersDealForm::create($validated_request);

        return redirect()->route('admin.brothers-deal-forms.index');
    }

    public function edit(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), ''); 

        $specialists = User::where('user_type','specialist')->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brothersDealForm->load('big_brother', 'small_brother', 'specialist');

        return view('admin.brothersDealForms.edit', compact('big_brothers', 'specialists',  'small_brothers', 'specialists', 'brothersDealForm'));
    }

    public function update(UpdateBrothersDealFormRequest $request, BrothersDealForm $brothersDealForm)
    {
        $brothersDealForm->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));
        return redirect()->route('admin.brothers-deal-forms.index');
    }

    public function show(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForm->load('big_brother', 'small_brother',  'specialist');

        return view('admin.brothersDealForms.show', compact('brothersDealForm'));
    }

    public function destroy(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForm->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));
        return back();
    }

    public function massDestroy(MassDestroyBrothersDealFormRequest $request)
    {
        BrothersDealForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function printForm(BrothersDealForm $brothersDealForm)
    {
        $big_brother=BigBrother::findOrFail($brothersDealForm->big_brother_id);
        $small_brother=SmallBrother::findOrFail($brothersDealForm->small_brother_id);
        $approvment_form_id=ApprovementForm::where('big_brother_id',$brothersDealForm->big_brother_id)->first()->id;
        return view('forms.brothersDeal', compact('brothersDealForm','big_brother','small_brother','approvment_form_id'));
    }
}
