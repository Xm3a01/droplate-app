<div>
    <div class="card-body">
        <div class="row my-4 justify-content-between">
            {{-- <div class="col-md-3" id="print"><a href="{{ route('reports') }}" class="btn btn-sm btn-info">
                    <i class="fa fa-print"></i> Print</a></div> --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <form id="filter-form">
                        <label for="">Name or Email</label>
                        <input type="text" name="" id="item" class="form-control form-control-sm"
                        placeholder="Name or E-mail">
                    </div>
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-info btn-xs"> <i class="fa fa-filter"></i>
                            Filter</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <table id="loading-table" class="table table-bordered table-striped">
            <thead class="bg-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Regoin</th>
                    <th>City</th>
                    <th>Permission</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
            </tfoot>
        </table>
    </div>

</div>
