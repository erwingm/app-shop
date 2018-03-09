@extends('layouts.app')
@section('title', 'Bienvedio a sistema de pedidos en linea')
@section('body-class','product-page')

@section('content')
     <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
   
        </div>

        <div class="main main-raised">
            <div class="container">

                <div class="section">
                    <h2 class="title">Editar Categoria</h2>
                     @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre categoria</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $category->name)  }}" >
                        </div>
                    </div>

                      <div class="col-sm-6">

                            <label class="control-label">Imagen de la Categoria</label>
                            <input type="file" name="image">
                            @if ($category->image)
                            <p class="help-block">
                                Subir solo si desea reemplazar la <a href="{{ asset('/images/categories/'.$category->image) }}" target="_blank"> imagen actual</a>
                            </p>
                            @endif

                    </div>

                
                </div>
                    <textarea class="form-control" placeholder="Descripcion del Producto" rows="5" name="description">{{ old('description', $category->description) }}</textarea>

                    <button class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{ url ('admin/categories') }}" class="btn btn-default">Cancelar</a>


                            
                    </form>


                </div>

            </div>

        </div>

        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                               About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
                </div>
            </div>
        </footer>
@endsection

