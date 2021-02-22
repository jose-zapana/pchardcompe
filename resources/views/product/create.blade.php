@extends('layouts.appDashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/select2.min.css') }}" />
@endsection

@section('openModProduct')
    open
@endsection

@section('activeCreateProduct')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li>
                <i class="ace-icon fa fa-shopping-basket"></i>
                <a href="{{ route('product.index') }}">Productos</a>
            </li>
            <li class="active">Crear Producto</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div><!-- /.nav-search -->
    </div>
@endsection

@section('content')
    <form class="form-horizontal" id="formCreate" data-url="{{ route('product.store') }}">
        @csrf
        <h4 class="lighter">
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
            Mantenedor de Productos
        </h4>

        <div class="hr hr-18 hr-double dotted"></div>

        <div class="widget-box">
            <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="widget-title lighter">Información del producto</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div id="fuelux-wizard-container">
                        <div>
                            <ul class="steps">
                                <li data-step="1" class="active">
                                    <span class="step">1</span>
                                    <span class="title">Información General</span>
                                </li>

                                <li data-step="2">
                                    <span class="step">2</span>
                                    <span class="title">Categorías</span>
                                </li>

                                <li data-step="3">
                                    <span class="step">3</span>
                                    <span class="title">Galería de imágenes</span>
                                </li>
                            </ul>
                        </div>

                        <hr />

                        <div class="step-content pos-rel">
                            <div class="step-pane active" data-step="1">
                                <div class="center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="name"> Nombre del producto </label>

                                            <div class="col-sm-8">
                                                <input type="text" id="name" name="name" placeholder="Ejm: Laptop Lenovo" class="col-xs-10 col-sm-10" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="description"> Descripción </label>

                                            <div class="col-sm-8">
                                                <input type="text" id="description" name="description" placeholder="Ejm: Laptop ...." class="col-xs-10 col-sm-10" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="stock"> Existencias  </label>

                                            <div class="col-sm-8">
                                                <input type="text" id="stock" name="stock" placeholder="Ejm: CompuPlaza" class="col-xs-10 col-sm-10" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="unit_price"> Precio unitario </label>

                                            <div class="col-sm-8">
                                                <input type="text" id="unit_price" name="unit_price" placeholder="Ejm: 100.00" class="col-xs-10 col-sm-10" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label no-padding-right" for="shop"> Nombre de Tienda </label>

                                            <div class="col-sm-8">
                                                <select name="shop" id="shop" class="select2" data-placeholder="Seleccione una tienda ...">
                                                    <option value=""> </option>
                                                    @foreach( $shops as $shop )
                                                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-md-offset-2">
                                        <h4 class="lighter">
                                            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                                            Especificaciones del producto
                                        </h4>
                                        <div class="form-group">
                                            <div class="col-sm-5">
                                                <div class="col-sm-12">
                                                    <input type="text" data-info class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="col-sm-12">
                                                    <input type="text" data-specification class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-success btn-xs"><i class="ace-icon fa fa-plus icon-animated-hand-pointer with"></i>Agregar</button>
                                            </div>
                                        </div>
                                        <template id="template-item">
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <div class="col-sm-12">
                                                        <input type="text" data-info />
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="col-sm-12">
                                                        <input type="text" data-specification />
                                                    </div>
                                                </div>
                                            </div>
                                        </template>

                                    </div>
                                </div>
                            </div>

                            <div class="step-pane" data-step="2">
                                <div class="center">
                                    <h3 class="green">Congrats!</h3>
                                    Your product is ready to ship! Click finish to continue!
                                </div>
                            </div>

                            <div class="step-pane" data-step="3">
                                <div class="center">
                                    <h3 class="green">Congrats!</h3>
                                    Your product is ready to ship! Click finish to continue!
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr />
                    <div class="wizard-actions">
                        <button class="btn btn-prev">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            Anterior
                        </button>

                        <button class="btn btn-success btn-next" data-last="Finalizar">
                            Siguiente
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div>

    </form>
@endsection

@section('scripts')
    <script src="{{ asset('intranet/assets/js/wizard.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/jquery-additional-methods.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/bootbox.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('intranet/assets/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function($) {

            $('.select2').css('width','300px').select2({allowClear:true})
                .on('change', function(){
                    $(this).closest('form').validate().element($(this));
                });

            var $validation = false;
            $('#fuelux-wizard-container')
                .ace_wizard({
                    //step: 2 //optional argument. wizard will jump to step "2" at first
                    //buttons: '.wizard-actions:eq(0)'
                })
                .on('actionclicked.fu.wizard' , function(e, info){
                    if(info.step == 1 && $validation) {
                        if(!$('#validation-form').valid()) e.preventDefault();
                    }
                })
                //.on('changed.fu.wizard', function() {
                //})
                .on('finished.fu.wizard', function(e) {

                    // Enviar la información con ajax

                    bootbox.dialog({
                        message: "Thank you! Your information was successfully saved!",
                        buttons: {
                            "success" : {
                                "label" : "OK",
                                "className" : "btn-sm btn-primary"
                            }
                        }
                    });
                }).on('stepclick.fu.wizard', function(e){
                //e.preventDefault();//this will prevent clicking and selecting steps
            });


            //jump to a step
            /**
             var wizard = $('#fuelux-wizard-container').data('fu.wizard')
             wizard.currentStep = 3;
             wizard.setState();
             */

            //determine selected step
            //wizard.selectedItem().step

            $('#modal-wizard-container').ace_wizard();
            $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');


            /**
             $('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});

             $('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
             */

            $(document).one('ajaxloadstart.page', function(e) {
                //in ajax mode, remove remaining elements before leaving page
                $('[class*=select2]').remove();
            });
        })
    </script>
    <script src="{{ asset('js/product/create.js') }}"></script>
@endsection