<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBigBrotherRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBigBrotherRequest;
use App\Http\Requests\UpdateBigBrotherRequest;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Models\Characteristic;
use App\Models\Skill;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Alert;

class BigBrotherController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('big_brother_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bigBrothers = BigBrother::with(['user', 'charactarstics', 'skills'])->get();

        return view('admin.bigBrothers.index', compact('bigBrothers'));
    }

    public function create()
    {
        abort_if(Gate::denies('big_brother_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');
        $countries = Country::get()->pluck('name', 'id');

        return view('admin.bigBrothers.create', compact( 'charactarstics', 'skills','countries'));
    }

    public function store(StoreBigBrotherRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => 'big_brother',
            'identity_number' => $request->identity_number,
            'identity_date' => $request->identity_date,
            'dbo' => $request->dbo,
            'marital_status' => $request->marital_status,
            'city_id' => $request->city_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'degree' => $request->degree,
        ]);

        if ($request->input('cv', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($request->input('image', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }
        
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        $bigBrother=BigBrother::create ([
            'job'=>$request->job,
            'job_place'=>$request->job_place,
            'salary'=>$request->salary,
            'family_male'=>$request->family_male,
            'family_female'=> $request->family_female,
            'marital_status'=>$request->marital_status,
            'brotherhood_reason'=>$request->brotherhood_reason,
            'user_id'=>$user->id,
            'small_brother_id'=>$request->small_brother_id,
        ]);
        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', []));

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        if($request->has('form_type') && $request->form_type == 'register'){
            Alert::success(trans('global.flash.success'), 'تم أرسال طلبك بنجاح للأدارة');
            return redirect()->route('login');
        }
        return redirect()->route('admin.big-brothers.index');
    }

    public function edit(BigBrother $bigBrother,User $user)
    {
        abort_if(Gate::denies('big_brother_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');
        $specialists = User::where('user_type','specialist')->get()->pluck('email','id')->prepend(trans('global.pleaseSelect'), '');
        $bigBrother->load('user', 'charactarstics', 'skills');
        $countries = Country::get()->pluck('name', 'id');


        return view('admin.bigBrothers.edit', compact('charactarstics', 'skills', 'bigBrother','countries','specialists'));
    }

    public function update(UpdateBigBrotherRequest $request, BigBrother $bigBrother)
    {
        $bigBrother->update([
            'job'=>$request->job,
            'job_place'=>$request->job_place,
            'salary'=>$request->salary,
            'family_male'=>$request->family_male,
            'family_female'=> $request->family_female,
            'marital_status'=>$request->marital_status,
            'brotherhood_reason'=>$request->brotherhood_reason, 
            'specialist_id'=>$request->specialist_id, 
        ]);

        $user = User::find($bigBrother->user_id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password == null ? $user->password : bcrypt($request->password),
            'identity_number' => $request->identity_number,
            'identity_date' => $request->identity_date,
            'dbo' => $request->dbo,
            'marital_status' => $request->marital_status,
            'country' => $request->country,
            'city_id' => $request->city_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'degree' => $request->degree,
        ]);

        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', [])); 
        
        if ($request->input('cv', false)) {
            if (!$user->cv || $request->input('cv') !== $user->cv->file_name) {
                if ($user->cv) {
                    $user->cv->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($user->cv) {
            $user->cv->delete();
        }

        if ($request->input('image', false)) {
            if (!$user->image || $request->input('image') !== $user->image->file_name) {
                if ($user->image) {
                    $user->image->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($user->image) {
            $user->image->delete();
        }
        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('admin.big-brothers.index');
    }

    public function show(BigBrother $bigBrother)
    {
        abort_if(Gate::denies('big_brother_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        global $skills;

        $bigBrother->load('user', 'charactarstics', 'skills','small_brother');
        $skills = $bigBrother['skills'];

        $selected_small_brothers = BigBrother::where('small_brother_id','!=',null)->get()->pluck('small_brother_id');
        $small_brothers = SmallBrother::whereNotIn('id',$selected_small_brothers)->whereHas('skills',function($query){
            $query->whereIn('id',$GLOBALS['skills']);
        })->get()->take(5);

        return view('admin.bigBrothers.show', compact('bigBrother','small_brothers'));
    }

    public function destroy(BigBrother $bigBrother)
    {
        abort_if(Gate::denies('big_brother_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bigBrother->delete();


        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroyBigBrotherRequest $request)
    {
        BigBrother::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function printinfo(BigBrother $bigBrother)
    {
        $userinfo=User::findOrFail($bigBrother->user_id);
         $bigbrothers=BigBrother::with('charactarstics')->get();

        return view('forms.bigBrother_registration', compact('userinfo','bigBrother','bigbrothers'));
    }

    public function chooseSmallbrother(Request $request ){

        $BigBrother=BigBrother::find($request->big_brother_id);

        $BigBrother->update([

            'small_brother_id'=>$request->small_brother_id,


        ]);
        return response()->json([
            'status' => true,

        ]);
    }

}
