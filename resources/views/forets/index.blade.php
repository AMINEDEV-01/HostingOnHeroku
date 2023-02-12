@extends('layouts.app')

@section('title', 'Forets List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Forets</h1>

            
          
            <div class="row">
                
                <div class="col-md-6">
                    <a href="{{ route('forets.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Ajouter une nouvelle intervention
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('forets.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Exporter vers excel
                    </a>
                </div>
                
                
            </div>
            

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Toutes les forets</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
<!-- identifiant programme dpef ccdrf secteur foret_ou_perimetre statut commune parcelle element sup_ha strate calculated_column_1 annee essence intervention details_intervention observation  -->
        
                                <th width="0%">identifiant</th>
                                <th width="10%">region_anef</th>
                                <th width="15%">dpef_anef</th>
                                <th width="15%">ccdrf</th>
                                <th width="10%">secteur</th>
                                <th width="15%">foret_ou_perimetre</th>
                                <th width="15%">statut_juridique</th>
                                <th width="10%">commune</th>
                                <th width="10%">serie</th>
                                <th width="10%">parcelle</th>
                                <th width="10%">strate</th>
                                <th width="10%">annee</th>
                                <th width="10%">essence</th>
                                <th width="10%">intervention</th>
                                <th width="10%">details_intervention</th>
                                <th width="10%">unite</th>
                                <th width="10%">physique</th>
                                <th width="10%">observation</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        
                        
                    </table>

                    
                </div>
            </div>
        </div>

    </div>

    @include('forets.delete-modal')
    @include('common.footer')
    @endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function(){
 $('#from_date').datepicker({ 
  todayBtn:'linked',
  dateFormat: 'dd/mm/yy',
  autoclose:true
});
 $('#to_date').datepicker({ 
  todayBtn:'linked',
  dateFormat: 'dd/mm/yy',
  autoclose:true
});


 load_data();

 function load_data(from_date = '', to_date = '', filter_status= '')
 {
  
  $('#dataTable').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url:'{{ route("forets.index") }}',
    data:{from_date:from_date, to_date:to_date , filter_status:filter_status},
    
   },
//    <!-- identifiant programme dpef ccdrf secteur foret_ou_perimetre statut commune parcelle element sup_ha strate calculated_column_1 annee essence intervention details_intervention observation  -->
 
   columns: [
    {
     data:'identifiant',
     name:'identifiant'
    },
    {
     data:'region_anef',
     name:'region_anef'
    },
    {
     data:'dpef_anef',
     name:'dpef_anef'
    },
    {
     data:'ccdrf',
     name:'ccdrf'
    },
    {
     data:'secteur',
     name:'secteur'
    },
    {
     data:'foret_ou_perimetre',  
     name:'foret_ou_perimetre'
    },
    {
     data:'statut_juridique',
     name:'statut_juridique'
    }
    ,
    {
     data:'commune',
     name:'commune',
    }
    ,
    {
     data:'serie',
     name:'serie',
    }
    ,
    {
     data:'parcelle',
     name:'parcelle',
    },
    {
     data:'strate',
     name:'strate',
    },
    {
     data:'annee',
     name:'annee',
    }
    ,
    {
     data:'essence',
     name:'essence',
    },
    {
     data:'intervention',
     name:'intervention',
    },
    {
     data:'details_intervention',
     name:'details_intervention',
    },
    {
     data:'unite',
     name:'unite',
    },
    {
     data:'physique',
     name:'physique',
    },
    {
     data:'observation',
     name:'observation',
    },
    {
     data:'action',
     name:'action'
    }
   ],
   columnDefs: [
            {
                target: 0,
                visible: false,
                searchable: false,
            },            
        ],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
 
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '.') * 1 : typeof i === 'number' ? i : 0;
            };
 
            // Total over all pages
            total = api
                .column(16)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
 
            // Update footer
            $(api.column(4).footer()).html('Physique Total:'+' ' + total.toFixed(2) + '');
        },

    
  });
  


 
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  var filter_status = $('#filter_status').val();
  if(from_date != '' &&  to_date != '' && filter_status != '')
  {
   $('#dataTable').DataTable().destroy();
   load_data(from_date, to_date, filter_status);
  }
  else
  {
   alert('Both Date is required and the status(Non validé/validé)');
  }
 });

 $('#refresh').click(function(){
  $('#filter_status').val('');
  $('#from_date').val('');
  $('#to_date').val('');
  $('#dataTable').DataTable().destroy();
  load_data();
 });

 

});




</script>


@endsection
