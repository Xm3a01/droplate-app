<div>
    <div class="card-body">
        <div class="row my-4 justify-content-between">
            {{-- <div class="col-md-3" id="print"><a href="{{ route('reports') }}" class="btn btn-sm btn-info">
                    <i class="fa fa-print"></i> Print</a></div> --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <form id="filter-form">
                            <label for="">Year</label>
                            <select name="year" id="year" class="form-control form-control-sm">
                                <option value="" selected>Year</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Clinet name</label>
                        <input type="text" name="client" id="client" class="form-control form-control-sm" placeholder="client name">
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
                    <th>No</th>
                    <th>Client phone</th>
                    <th>Client name</th>
                    <th>Delivery price</th>
                    <th>Total Selling price</th>
                    <th>Order Status</th>
                    <th>Address</th>
                    <th>Quantity</th>
                    <th>Order Progress</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
            </tfoot>
        </table>
    </div>

</div>
