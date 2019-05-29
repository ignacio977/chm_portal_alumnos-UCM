<!--Pagina Actual:{!! $PaginaActual=$Practicas->currentPage() !!}<br>-->
<!--Paginas a mostrar:{!! $PaginasMostrar=$Practicas->hasMorePages() !!}<br>-->
<!--Total de Paginas:{!! $TotalPaginas=$Practicas->lastPage() !!}<br>-->
<!--Siguiente Url pagina:{!! $siguientePag=$Practicas->nextPageUrl() !!}<br>-->
<!--perpage:{!! $Practicas->url(1) !!}<br>-->

<ul class="pagination">
    @if($PaginaActual == 1)
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    @else
        <li class="waves-effect"><a href={{$Practicas->url($PaginaActual-1)}}><i class="material-icons">chevron_left</i></a></li>
    @endif
    @for($i=1;$i<$TotalPaginas+1;$i++)
        @if($i==$Practicas->currentPage())
            <li class="active"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
        @else
            <li class="waves-effect"><a href={{$Practicas->url($i)}}>{{$i}}</a></li>
        @endif
    @endfor
    @if($PaginaActual == $TotalPaginas)
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    @else
        <li class="waves-effect"><a href={{$Practicas->url($PaginaActual+1)}}><i class="material-icons">chevron_right</i></a></li>
    @endif
</ul>