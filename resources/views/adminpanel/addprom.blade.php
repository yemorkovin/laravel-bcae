
@extends('adminpanel/mainadmin')
@section('title', 'Админ панель')
@section('content')
<style type="text/css">
    input, select, option{
        color: #000;
        margin: 10px;
    }
    #hidebloxk{
        display: none;
        border: 1px solid #fff;
        border-radius: 4px;
        padding: 15px;
    }
    a{
        cursor: pointer;
    }
</style>
 <div class="single-product-tab-area mg-b-30" style="color: #fff; padding: 14px;">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
 <div class="checkbox-setting-pro" >
  <h2>Добавить помещение</h2> 
    <form method="post">
        @csrf
        areaMin: <input class="form-control" type="text" name="areaMin" >
        areaMax: <input class="form-control" type="text" name="areaMax">
        isactive:
        <select name="isactive" class="select2_demo_3 form-control">
            <option value="on">on</option>
            <option value="off">off</option>
        </select><br />
        crmId: <input class="form-control" type="number" name="crmId" >
         <select name="type_id" class="select2_demo_3 form-control">
            @foreach ($types as $type)
                    <option value="{{$type->id_type}}">{{$type->name_types}}</option>
            @endforeach
            </select>
        
        floor:<input class="form-control" type="number" name="floor" >
        price:<input class="form-control" type="text" name="price" >
        pricecur: <input class="form-control" type="text" name="pricecur" >
        <select name="id_typedeal" class="select2_demo_3 form-control">
            @foreach ($typedeal as $type)
                    <option value="{{$type->id_typedeal}}">{{$type->name_typedeal}}</option>
            @endforeach
            </select>
            <select name="id_tax" class="select2_demo_3 form-control">
            @foreach ($tax as $t)
                    <option value="{{$t->id_tax}}">{{$t->name_tax}}</option>
            @endforeach
            </select>
        isready: <input class="form-control" type="text" name="isready" >
        readydate: <input class="form-control" type="text" name="readydate">
        explcur: <input class="form-control" type="text" name="explcur">
        explprice: <input class="form-control" type="text" name="explprice">
        layout: <input class="form-control" type="text" name="layout">
        lastsynctime: <input class="form-control" type="text" name="lastsynctime">
        <input type="submit" name="" value="Добавить" class="btn btn-custon-four btn-success" />



  </form>      
                                                                            </div>
                                            </div></div></div></div></div></div>

@endsection

