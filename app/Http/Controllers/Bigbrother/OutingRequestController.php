<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOutingRequestRequest;
use App\Http\Requests\StoreOutingRequestRequest;
use App\Http\Requests\UpdateOutingRequestRequest;
use App\Models\BigBrother;
use App\Models\OutingRequest;
use App\Models\OutingType;
use App\Models\SmallBrother;
use Gate;
use Illuminate\Http\Request;
use Alert;
use Symfony\Component\HttpFoundation\Response;

class OutingRequestController extends Controller
{
    public function index()
    {

        $outingRequests = OutingRequest::with(['outing_type', 'big_brother', 'small_brother'])->get();

        return view('Bigbrother.outingRequests.index', compact('outingRequests'))->withoutingRequests(outingRequest::paginate(6));
    }

    public function create()
    {


        $outing_types = OutingType::all()->pluck('name_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('Bigbrother.outingRequests.create', compact('outing_types', 'big_brothers', 'small_brothers'));
    }

    public function store(StoreOutingRequestRequest $request)
    {
        $validated_request = $request->all();
        $big_brother = BigBrother::find($validated_request['big_brother_id']);
        $validated_request['small_brother_id'] = $big_brother->small_brother_id;
        // $validated_request['big_brother_id'] = Auth::id();
        $validated_request['big_brother_id'] = $big_brother->id;
        $outingRequest = OutingRequest::create($validated_request);

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return redirect()->route('bigbrother.outing-requests.index');
    }

    public function edit(OutingRequest $outingRequest)
    {


        $outing_types = OutingType::all()->pluck('name_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $outingRequest->load('outing_type', 'big_brother', 'small_brother');

        return view('Bigbrother.outingRequests.edit', compact('outing_types', 'big_brothers', 'small_brothers', 'outingRequest'));
    }

    public function update(UpdateOutingRequestRequest $request, OutingRequest $outingRequest)
    {
        $outingRequest->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('bigbrother.outing-requests.index');
    }

    public function show(OutingRequest $outingRequest)
    {


        $outingRequest->load('outing_type', 'big_brother', 'small_brother');

        return view('Bigbrother.outingRequests.show', compact('outingRequest'));
    }

    public function destroy(OutingRequest $outingRequest)
    {


        $outingRequest->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroyOutingRequestRequest $request)
    {
        OutingRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
