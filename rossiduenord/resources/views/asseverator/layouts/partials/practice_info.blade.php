{{-- bottom fixed div  --}}
<div class="practices-info  py-3">
    <div class="d-flex justify-content-between align-items-center h-100">
        <div class="practice-count text-center">
            <span class="mx-3 blue">N° Pratiche in lista</span>
            <input type="text" class="text-center border-blue" name="" id="" value="{{count($practices)}}"  disabled>
        </div>
        <div class="practice-imports d-flex justify-content-between text-center">
            <div class="fianl-Sal mx-3">
                <span class="mx-2 blue">Importo SAL €</span>
                <input type="text" class="text-center border-blue" name="" id="" value="{{number_format($tot_sal, 2, ',', '.')}}" disabled>
            </div>
            <div class="expected-Sal">
                <span class="mx-2 blue">Importo SAL stimato €</span>
                <input type="text" class="text-center border-blue" name="" id="" value="{{number_format($expected_sal, 2, ',', '.')}}" disabled>
            </div>
        </div>
    </div>
</div>