<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Category List
        </h2>
    </x-slot>
<div class="row">
<div class="col-md-8">
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
<!--     <div class="block mb-8">
        <a href="{{ route('groups.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Category</a>
    </div> -->
    <div class="flex flex-col">
<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200 w-full">
        <thead>
        <tr>
            <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Group Name
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Details
            </th>

            <th scope="col" width="200" class="px-6 py-3 bg-gray-50">
                Action
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

        </tbody>
    </table>
</div>
</div>
</div>
</div>

</div>
</div>

<div class="col-md-4">
	
<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">

<div class=" md:mt-0 md:col-span-2">
   <!--  <form method="post" action="{{ route('groups.store') }}"> -->
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
		  <div class="card-header"><span id="addHeader">Add New</span><span id="updateHeader">Update</span></div>
            <div class="px-4 bg-white sm:p-6">
               <label for="grp_name" class="block font-medium text-sm text-gray-700">Group Name</label>
                <input type="text" name="grp_name" id="grp_name"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                       value="{{ old('grp_name', '') }}" />
                    <span class="text-danger" id="nameError"></span>
            </div>
            <div class="px-4 bg-white sm:p-6">
                <label for="status" class="block font-medium text-sm text-gray-700">Status</label>

                <input type="text" name="status" id="status"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                       value="{{ old('status', '') }}"/>
                    <span class="text-danger" id="statusError"></span>
            </div>
             <div class="px-4 bg-white sm:p-6">
                <label for="details" class="block font-medium text-sm text-gray-700">Details</label>

                <textarea type="text" name="details" id="details"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                       value="{{ old('details', '') }}"></textarea>
                <span class="text-danger" id="detailsError"></span>
            </div>


            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" id="addButton" onclick="adddata()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"> Add </button>
                <input type="hidden" id="id">
                <button id="updateButton" onclick="updateData()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Update
                </button>
            </div>
        </div>
    <!-- </form> -->
</div>
</div>
</div>
</div>
<script>
    $('#addHeader').show();
        $("#updateHeader").hide();
    $('#addButton').show();
        $("#updateButton").hide();

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
        }
    })
    function alldata() {
        $.ajax({
            type:'GET',
            dataType:'json',
            url:"alldata",
            success:function(response){
                var data = ""
                $.each(response,function(key , value){
                    data = data + "<tr>"
                    data = data + "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" + value.id + "</td>"
                    data = data + "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" + value.grp_name + "</td>"
                    data = data + "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" + value.status + "</td>"
                    data = data + "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>" + value.details + "</td>"
                    data = data + "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>"
                    // data = data + "<button class='text-blue-600 hover:text-blue-900 mb-2 mr-2'>View</button>"
                    data = data + "<button class='text-indigo-600 hover:text-indigo-900 mb-2 mr-2' onclick='editData("+value.id+")'>Edit</button>"
                    data = data + "<button class='text-red-600 hover:text-red-900 mb-2 mr-2' onclick='deleteData("+value.id+")'>Delete</button>"
                    data = data + "</td>"
                    data = data + "</tr>"
                })
                $('tbody').html(data);
                   
            }
        })
    }
alldata();

function clearData(){
  $('#grp_name').val('');
  $('#status').val('');
    $('#details').val('');  
   $('#nameError').text('');
  $('#statusError').text('');
    $('#detailsError').text(''); 
}

function adddata(){
    var grp_name = $('#grp_name').val();
    var status = $('#status').val();
    var details = $('#details').val();

$.ajax({
    type:"GET",
    dataType:'json',
    data:{grp_name:grp_name,status:status,details:details},
    url:"adddata",
    success:function(data){
        clearData();
        alldata();
               const Msg = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 1500
                    })

                    Msg.fire({
                      type: 'success',
                      title: 'Data Added Successfully',
                    })
    },
        error:function(error){
         clearData();
         $('#nameError').text(error.responseJSON.errors.grp_name);
         $('#statusError').text(error.responseJSON.errors.status);
         $('#detailsError').text(error.responseJSON.errors.details);
    }
})
}

function editData(id){
    $.ajax({
        type:"GET",
        dataType:"json",
        url:"editdata/"+id,
        success:function(data){
                $('#addHeader').hide();
               $("#updateHeader").show();
                 $('#addButton').hide();
                 $("#updateButton").show();

                 
            $('#id').val(data.id);
              $('#grp_name').val(data.grp_name);
              $('#status').val(data.status);
             $('#details').val(data.details); 

        }
        })
}

function updateData(){
    var id = $('#id').val();
    var grp_name = $('#grp_name').val();
    var status = $('#status').val();
    var details = $('#details').val();

$.ajax({
    type:"GET",
    dataType:'json',
    data:{grp_name:grp_name,status:status,details:details},
    url:"updatedata/"+id,
    success:function(data){
               $('#addHeader').show();
               $("#updateHeader").hide();
                 $('#addButton').show();
                 $("#updateButton").hide();
         clearData();
        alldata();
                const Msg = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 1500
                    })

                    Msg.fire({
                      type: 'success',
                      title: 'Data Updated Successfully',
                    })
    },
        error:function(error){
         clearData();
         $('#nameError').text(error.responseJSON.errors.grp_name);
         $('#statusError').text(error.responseJSON.errors.status);
         $('#detailsError').text(error.responseJSON.errors.details);
    }
})
}

function deleteData(id){
           Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to recover this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes !'
                    }).then((result) => {

                      if (result.isConfirmed) {
                        Swal.fire(
                            $.ajax({
                            type:"GET",
                            dataType:"json",
                            url:"deletedata/"+id,
                            success:function(data){
                            alldata();

                                  const Msg = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  icon: 'success',
                                  showConfirmButton: false,
                                  timer: 1500
                                })

                                    Msg.fire({
                                      type: 'success',
                                      title: 'Data Deleted Successfully',
                                    })
                                }
                            })
                        )

                  }else{
                    swal("Canceled");
                  }

              })
        }

</script>
</x-app-layout>

