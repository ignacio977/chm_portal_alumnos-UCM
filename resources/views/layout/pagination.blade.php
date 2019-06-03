<!--Pagina Actual:{!! $PaginaActual=$Practicas->currentPage() !!}<br>-->
<!--Paginas a mostrar:{!! $PaginasMostrar=$Practicas->hasMorePages() !!}<br>-->
<!--Total de Paginas:{!! $TotalPaginas=$Practicas->lastPage() !!}<br>-->
<!--Siguiente Url pagina:{!! $siguientePag=$Practicas->nextPageUrl() !!}<br>-->
<!--perpage:{!! $Practicas->url(1) !!}<br>-->
<!--{{$PagXLado=2}}-->


<ul class="pagination">
    @if($PaginaActual == 1)
        <li class="disabled z-depth-1"><a href="#!"><i class="material-icons">fast_rewind</i></a></li>
        <li class="disabled z-depth-1"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    @else
        <li class="waves-effect z-depth-1"><a href={{$Practicas->url(1)}}><i class="material-icons">fast_rewind</i></a></li>
        <li class="waves-effect z-depth-1"><a href={{$Practicas->url($PaginaActual-1)}}><i class="material-icons">chevron_left</i></a></li>
    @endif
    @if($TotalPaginas>$PagXLado*2)
        @if($PaginaActual<=$PagXLado+1)
            @for($i=1;$i<=$PagXLado*2+1;$i++)
                @if($i>0)
                    @if($i==$Practicas->currentPage())
                        <li class="active z-depth-1"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
                    @else
                        <li class="waves-effect z-depth-1"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
                    @endif
                @endif
            @endfor
        @endif
        @if($PaginaActual>=($TotalPaginas-$PagXLado))
            @for($i=$TotalPaginas-$PagXLado*2;$i<=$TotalPaginas;$i++)
                @if($i<=$TotalPaginas)
                    @if($i==$Practicas->currentPage())
                        <li class="active z-depth-1"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
                    @else
                        <li class="waves-effect z-depth-1"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
                    @endif
                @endif
            @endfor
        @endif
        @if(($PaginaActual>$PagXLado+1)&&(($TotalPaginas-$PagXLado)>$PaginaActual))
            @for($i=$PaginaActual-$PagXLado;$i<=$PaginaActual+$PagXLado;$i++)
                @if($i==$Practicas->currentPage())
                    <li class="active z-depth-1"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
                @else
                    <li class="waves-effect z-depth-1"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
                @endif
            @endfor
        @endif
    @else
        @for($i=$PaginaActual-$PagXLado;$i<=$PaginaActual+$PagXLado;$i++)
            @if($i>0)
                @if($i<=$TotalPaginas)
                    @if($i==$Practicas->currentPage())
                        <li class="active z-depth-1"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
                    @else
                        <li class="waves-effect z-depth-1"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
                    @endif
                @endif
            @endif
        @endfor
    @endif
    @if($PaginaActual == $TotalPaginas)
        <li class="disabled z-depth-1"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        <li class="disabled z-depth-1"><a href="#!"><i class="material-icons">fast_forward</i></a></li>
    @else
        <li class="waves-effect z-depth-1"><a href={{$Practicas->url($PaginaActual+1)}}><i class="material-icons">chevron_right</i></a></li>
        <li class="waves-effect z-depth-1"><a href={{$Practicas->url($TotalPaginas)}}><i class="material-icons">fast_forward</i></a></li>
    @endif
</ul>