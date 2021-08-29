<x-app-layout>
    <div class="container p-5">
        <div class=" col-lg-12">
                <h4 class="m-3"  >Dirección de facturación</h4>
                <div class="card">
                <form class="content-center p-5 needs-validation" action="" novalidate="">

                <div class="items-center row g-3">
                    <div class="col-sm-10">
                    <label for="firstName" class="form-label" >Nombre del usuario</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" readonly value="{{auth()->user()->name}}" required="">
                    </div>

                    <div class="col-10">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com" _mstplaceholder="274417" readonly value="{{auth()->user()->email}}" required="">
                    </div>

                    <div class="col-10">
                        <label for="bests" class="form-label">Nombre de la apuesta</label>
                        <input type="text" class="form-control" id="email" readonly value="{{$best->name}}" required="">
                    </div>

                    <div class="col-10">
                        <label for="type" class="form-label">Tipo de apuesta</label>

                        <select name="type" id="type" class="form-select form-select-sm">
                            @foreach ($types as $type )
                                <option  value="{{$type->id}}" >{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 input-group">
                        <span id="amount" class="input-group-text">$</span>
                        <input type="number" name="amount" class="form-control" aria-label="Importe (al dólar más cercano)" _mstaria-label="725569">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit" _msthash="1634243" _msttexthash="746941">Continuar con el proceso de pago</button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
