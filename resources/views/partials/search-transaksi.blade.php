<div class="row">
    <div class="col-12">
        <form action="{{ route('transaksi.carian-harian') }}" method="get">
            @csrf

            <div class="form-group row">
                <label class="col-form-label col-md-2" style="color: white">
                    Tarikh Mula <strong class="text-danger">*</strong>
                </label>
                <div class="col-2">
                    <input type="date" name="tarikhMula" class="form-control form-control-alternative" value="" required>
                </div>

                <label class="col-form-label col-md-2" style="color: white">
                    Tarikh Akhir <strong class="text-danger">*</strong>
                </label>
                <div class="col-2">
                    <input type="date" name="tarikhAkhir" class="form-control form-control-alternative" value="" required>
                </div>
            </div><!-- /.form-group -->

            <div class="form-group row">
                <label class="col-form-label col-md-2" style="color: white">
                    Nama Petugas <strong class="text-danger">*</strong>
                </label>
                <div class="col-2">
                    <select name="kasyer"  class="form-control form-control-alternative">
                        <option value="">-Pilih Kasyer-</option>
                        @foreach($selectKasyer as $kasyer)
                            <option value="{{$kasyer->id}}">{{$kasyer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i> Carian
                    </button>
                </div>
            </div><!-- /.form-group -->
        </form>
    </div>
</div><!-- /.row -->
