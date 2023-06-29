
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
  <h2 style="color: #fff" align="center">Все помещения</h2>
  
    
  
                                                                           
                                                                                
                                                                               
                                                                                </form>


    @foreach ($data as $d)
    <form method="post">
        @csrf
        <input type="hidden" name="id" value="{{$d->id}}">
 <div style="color: #fff; margin: 10px">Помещение №{{$d->id}}   
                                                                                        @if ($d->isActive == 'on')
                                                                                            <input type="checkbox"
                                                                                             checked readonly>

                                                                                          @else
                                                                                          <input type="checkbox"
                                                                                             readonly>

                                                                                          @endif
      <a onclick="next(this)" class="has-arrow">Редактировать</a>  
        <div id="hidebloxk">
        areaMin: <input class="form-control" type="text" name="areaMin" value="{{$d->areaMin}}">
        areaMax: <input class="form-control" type="text" name="areaMax" value="{{$d->areaMax}}">
        isactive:
        @if ($d->isActive == 'on')
                                                                                            <input type="checkbox"
                                                                                             checked name="isActive">

                                                                                          @else
                                                                                          <input type="checkbox"
                                                                                             name="isActive">

                                                                                          @endif

                                                                                          <br />
        crmId: <input class="form-control" type="number" name="crmId" value="{{$d->crmId}}"></td>
         <select name="type_id" class="select2_demo_3 form-control">
            @foreach ($types as $type)
                @if($type->id_type == $d->type_id)
                    <option value="{{$type->id_type}}" selected>{{$type->name_types}}</option>
                @else
                    <option value="{{$type->id_type}}">{{$type->name_types}}</option>
                @endif
            @endforeach
            </select>
        
        floor:<input class="form-control" type="number" name="floor" value="{{$d->floor}}">
        price:<input class="form-control" type="text" name="price" value="{{$d->price}}">
        pricecur: <input class="form-control" type="text" name="pricecur" value="{{$d->pricecur}}">
        <select name="id_typedeal" class="select2_demo_3 form-control">
            @foreach ($typedeal as $type)
                @if($type->id_typedeal == $d->id_typedeal)
                    <option value="{{$type->id_typedeal}}" selected>{{$type->name_typedeal}}</option>
                @else
                    <option value="{{$type->id_typedeal}}">{{$type->name_typedeal}}</option>
                @endif
            @endforeach
            </select>
            <select name="id_tax" class="select2_demo_3 form-control">
            @foreach ($tax as $t)
                @if($t->id_tax == $d->id_tax)
                    <option value="{{$type->id_typedeal}}" selected>{{$t->name_tax}}</option>
                @else
                    <option value="{{$type->id_typedeal}}">{{$t->name_tax}}</option>
                @endif
            @endforeach
            </select>
        isready: <input class="form-control" type="text" name="isready" value="{{$d->isready}}">
        readydate: <input class="form-control" type="text" name="readydate" value="{{$d->readydate}}">
        explcur: <input class="form-control" type="text" name="explcur" value="{{$d->explcur}}">
        explprice: <input class="form-control" type="text" name="explprice" value="{{$d->explprice}}">
        layout: <input class="form-control" type="text" name="layout" value="{{$d->layout}}">
        lastsynctime: <input class="form-control" type="text" name="lastsynctime" value="{{$d->lastsynctime}}">
        <input type="submit" name="" value="Обновить" class="btn btn-custon-four btn-success" />
        </div>
    </div>
</form>
    @endforeach



                                                                            </div>
                                            </div></div></div></div></div></div>

<script>
  function next(e){

    if(e.nextElementSibling.style.display == 'block'){
        e.nextElementSibling.style.display = 'none';
    }else{
        e.nextElementSibling.style.display = 'block';
    }

    }

    //document.addEventListener('click',e => console.log(e.target))


 
</script>

@endsection

