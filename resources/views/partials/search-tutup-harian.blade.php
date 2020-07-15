<div class="row">
    <div class="col-12">
        <form action="{{ route('tutup.carian-tutup-harian') }}" method="get">
            @csrf

            <div class="form-group row">
                <label class="col-form-label col-md-2" style="color: white">
                    Tarikh <strong class="text-danger">*</strong>
                </label>
                <div class="col-2">
                    <input type="date" name="tarikh" class="form-control form-control-alternative" value="" required>
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
