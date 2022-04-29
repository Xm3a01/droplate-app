<div>
    <div class="card-body">
        <div class="row my-4 justify-content-between">
            {{-- <div class="col-md-3" id="print"><a href="{{ route('reports') }}" class="btn btn-sm btn-info">
                    <i class="fa fa-print"></i> Print</a></div> --}}
            <div class="col-md-6">
                <form id="filter-form">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control form-control-sm">

                    </div>
                    <div class="col-md-3">
                            
                            <label for="">Year</label>
                            <select name="year" id="year" class="form-control form-control-sm">
                                <option value="" selected>Year</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Month</label>
                        <select name="month" id="month" class="form-control form-control-sm">
                            <option value="" selected>Month</option>
                            @for ($month = 1; $month <= 12; $month++)
                              <option value="{{ $month }}">{{ $month }}</option>                                
                            @endfor
                        </select>
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
                    <th>Descripton</th>
                    <th>Purchasing price</th>
                    <th>Selling price</th>
                    <th>Discount</th>
                    <th>Wholesale price</th>
                    <th>quantity</th>
                    <th>category</th>
                    <th>sub category</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
            </tfoot>
        </table>
    </div>

</div>
