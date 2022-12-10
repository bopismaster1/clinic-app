<div class="wrapper">
    <div class="row">

        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-success width-sm" data-toggle="modal" data-target="#newDoctor"><i class="fa-solid fa-user-doctor"></i>
                        New Doctor</button>
                    <div class="col-6 float-right">
                        <label class="sr-only" for="inlineFormInputGroup">name</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
                            </div>
                            <input type="text" class="form-control" wire:model='searchName' id="inlineFormInputGroup"
                                placeholder="Name">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($doctors)


                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <th scope="row">{{ $doctor->id }}</th>
                                            <td>{{ $doctor->name }}</td>
                                            <td>{{ $doctor->id_number }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action <i class="icon"><span
                                                                data-feather="chevron-down"></span></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        {{-- <a class="dropdown-item link-primary" href="{{route('doctor.checkup',[$patient->id])}}"><i class="fa-solid fa-circle-plus"></i> New Record</a>
                                                        <a class="dropdown-item" href="{{route("doctor.info",[$patient->id])}}"><i class="fa-solid fa-folder-open"></i> View Record</a> --}}
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $doctors->links() }}
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <form wire:submit.prevent='newDoctor' id="newDoctorForm">
                        <div wire:ignore.self id="newDoctor" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="newDoctorLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newDoctorLabel">New Doctor Info</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <hr>
                                        <div class="form-group">
                                            <label for="Name">Name</label>
                                            <input type="text" class="form-control" placeholder="Name" id="Name"
                                                wire:model.lazy="name">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="id_number">ID Number</label>
                                            <input type="text" class="form-control" placeholder="Contact Number"
                                                id="id_number" wire:model.lazy="id_number">
                                            @error('id_number')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener('closeModal', event => {
            $("#newDoctor").modal('hide');
            $("#newDoctorForm")[0].reset()
        })
    </script>
</div>
