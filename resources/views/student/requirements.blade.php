@extends('main')
@section('head')

@endsection

@section('content')

<div class="container">
        <div class="row" >
            <div class="col-md-10" align="center">
            <h3>Requirements</h3>
            </div>
        </div>
        <form>
        <div class="row">
               
                <h5><b>Application Letter</b>
               <label class="radio-inline">
                  
                </label> <input type="radio" id="al" name="al" value="0" checked="true">
                <b>No</b>
               <label class="radio-inline">
                </label>
                <input type="radio" id="al" name="al" value="1" >
                  <b>Yes</b>
                </h5>
              </div>
        </div>
        </form>
</div>
@endsection

@section('scripts')

@endsection
