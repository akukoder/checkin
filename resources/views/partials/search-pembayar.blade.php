<div class="row mb-5">
    <div class="col-6">
        <form action="{{ route('carian.pembayar') }}" method="get">
            @csrf

            <div class="form-group row">
                <div class="col-10">
                    <input type="search" name="search" class="form-control form-control-alternative" value="{{ $search }}" placeholder="No. Kad Pengenalan">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i> Carian
                    </button>
                </div>
            </div>
        </form>
    </div>
</div><!-- /.row -->
