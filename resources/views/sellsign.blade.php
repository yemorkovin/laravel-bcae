@extends('main')
@section('title', 'Описание БЦ Аэродом. Инфраструктура, компании-арендаторы в Аэродоме')
@section('content')
<div class="default-page block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                                <ul class="bread-crumbs">
                            <li class="bread-crumbs__link" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                <a itemprop="url" title="БЦ Аэродом" href="/" class="">
                                    <span itemprop="title">БЦ Аэродом</span>
                                </a>
                            </li>
                            <li class="bread-crumbs__link"> / </li>
                            <li class="bread-crumbs__link" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                <a itemprop="url" title="Купить офис в БЦ Аэродом" href="/sale" class="">
                                    Купить офис в БЦ Аэродом
                                </a>
                            </li>
                            <li class="bread-crumbs__link"> / </li>
                            <li class="bread-crumbs__link bread-crumbs__link_current">Офис {{$data->areaMin}}  м2</li>
                        </ul>                   </div>
                </div>
            </div>

            <!-- Office Page -->
            <div class="office-page office-page_JS block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="popup-window__headline">Продажа офиса {{$data->areaMin}} <span> м<sup>2</sup></span> в бизнес-центре Аэродом</span>
                        </div>
                    </div>
                </div>
                <div class="popup-window__slider default-gallery-slider default-gallery-slider_JS">
                        @foreach($gals as $g)
<div class="default-gallery-slider__cover" style="background-image: url('/public/images/gallery/{{$g->image}}')"></div>

                        @endforeach
                                           </div>
                <div class="container">
                    <div class="popup-window__content">
                                                <div class="row">
                            <div class="col-md-5 col-sm-7">
                                 <table class="characteristics-table">
                                            <tr>
                                                <td>Этаж:</td>
                                                <td>
                                                    {{$data->floor}}                                               </td>
                                            </tr>
                                            <tr>
                                                <td>Арендуемая площадь:</td>
                                                <td>{{$data->areaMin}} <span> м<sup>2</sup></span></td>
                                            </tr>
                                                                                        <tr>
                                                <td>Готовность:</td>
                                                <td>{{$data->isready}}</td>
                                            </tr>
                                            <tr>
                                                <td>Планировка:</td>
                                                <td>{{$data->layout}}</td>
                                            </tr>
                                            <tr>
                                                <td>Цена:</td>
                                                <td>{{$data->price}} руб. за м<sup>2</sup> в год</td>
                                            </tr>
                                                                                        <tr>
                                                <td>Налогообложение:</td>
                                                <td>{{$data->tax_name}}</td>
                                            </tr>
                                        </table>
                            </div>
                            <div class="col-md-1 col-sm-1"></div>
                            <div class="col-md-3 col-sm-4">
                                <div class="small-contacts-block small-contacts-block_colored" style="margin-bottom: 8px;padding: 15px;background: #32CD32">
                                            <a href="tel:+74994900592" class="default-contact-phone">Получить презентацию в Whatsapp</a>
                                            
                                        </div>
                                <div class="small-contacts-block small-contacts-block_colored">
                                    <a href="tel:+74994900592" class="default-contact-phone">+7 (499) 490-05-92</a>
                                    <a href="#" class="default-contact-call JS-get-call-popup-open">Обратный звонок</a>
                                </div>
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			
@endsection