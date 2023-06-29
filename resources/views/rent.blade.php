@extends('main')
@section('title', 'Аренда офиса в бизнес-центре Аэродом')
@section('content')
<!-- DEFAULT PAGE -->
		<div class="free-areas-in-rent-section default-page default-section default-section_gray-bg objects-table objects-table_rent JS-obects-table JS-obects-table_rent block">
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
    						<li class="bread-crumbs__link bread-crumbs__link_current">Снять офис в БЦ Аэродом</li>
            			</ul>
						<h1>Аренда офисов в бизнес-центре Аэродом</h1>
						<div class="default-content-block block">

							<table class="default-table default-table_closed default-table_JS">
								<thead class="default-table__thead">
									<tr>
										<td>Этаж</td>
										<td>Площадь</td>
										<td>Арендная<br>ставка</td>
										<td>Налоги</td>
										<td>За помещение<br>в месяц</td>
										<td>Состояние</td>
									</tr>
								</thead>
								<tbody class="default-table__tbody">
									@foreach($data as $d)
                            		<tr data-href="/block/rent/{{$d->id}}" href="/block/rent/{{$d->id}}" data-block-id="{{$d->id}}" data-block-type="rent">
                            			<td >
                            				<a href="/block/rent/{{$d->id}}" >
                            					{{$d->floor}} этаж
                            				</a>
                            			</td>
                            			<td > 
                            				<a href="/block/rent/{{$d->id}}" >
                            					{{$d->areaMin}} м<sup>2</sup>
                            				</a>
                            			</td>
                            			<td >
                            				<a href="/block/rent/{{$d->id}}" >
                            					{{$d->price}} руб.
                            				</a>
                            			</td>
                            			<td >
                            				<a href="/block/rent/{{$d->id}}" >
                            					{{$d->name_tax}}
                            				</a>
                            			</td>
                            			<td >
                            				<a href="/block/rent/{{$d->id}}" >
                            					{{$d->price * $d->areaMin}} руб.
                            				</a>
                            			</td>
                            			<td>
                            				<a href="/block/rent/{{$d->id}}">
                            					{{$d->isready}}
                            				</a>
                            			</td>
                            		</tr>
                            		@endforeach
							</table>
							<a href="#" class="show-more-default-link show-more-default-link_JS">Показать еще</a>
							<div class="small-contacts-block small-contacts-block_inline">
                                <a href="tel:+74994900592" class="default-contact-phone">+7 (499) 490-05-92</a>
								<a href="#" class="default-contact-call JS-get-call-popup-open">Обратный звонок</a>
							</div>
						</div>
						<p>
						    Для тех компаний, которые сделали свой выбор в пользу бизнес-центра «Аэродом» и хотели бы арендовать здесь офис, есть различные варианты аренды вакантных площадей. В данном офисном центре доступны к аренде как помещения с готовым ремонтом, так и под отделку. Качественный ремонт здесь выполнен с использованием высоко технологичных безопасных материалов. Планировка пространства – открытого типа. Минимальная арендуемая площадь блока составляет 150 м2.  
						</p>
						<p>
						    Ставка за метр в год составляет около 30 000 рублей в зависимости от характеристик арендуемого помещения. Оплата аренды реализуется ежемесячно авансом. Коммунальные платежи оплачиваются отдельно. Срок аренды – от 11 месяцев.
						</p>
						<p>
						    Аренда офиса в данном бизнес-центре станет отличным выбором для тех организаций, которые хотели бы разместить свое представительство в отличных условиях в Северо-Западном административном округе Москвы. 
						</p>
						<p>
						    Если Вас интересует аренда офиса в БЦ «Аэродом», обращайтесь к нам по телефону +7 (499) 490-05-92 или оставляйте заявку на нашем сайте.
						</p>
					</div>
				</div>
			</div>
		</div>
		
@endsection