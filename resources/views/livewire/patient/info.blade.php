<div class="wrapper">

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-3">
                        <img src="{{ asset('shreyu/images/users/avatar-7.jpg') }}" alt=""
                            class="avatar-lg rounded-circle">
                    </div>
                    <div class="mt-3 pt-2 border-top">
                        <h4 class="mb-3 font-size-15"> Information</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0 text-muted">
                                @php
                                    $age = App\Http\Livewire\Patient\Info::getAge($patientDetails->DOB);
                                @endphp
                                <tbody>
                                    <tr>
                                        <th scope="row">Age</th>
                                        <td>{{ $age }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone</th>
                                        <td>{{ $patientDetails->contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{ $patientDetails->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->

        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-activity-tab" data-toggle="pill" href="#pills-activity"
                                role="tab" aria-controls="pills-activity" aria-selected="true">
                                Activity
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-activity" role="tabpanel"
                            aria-labelledby="pills-activity-tab">
                            <h5 class="mt-3">Check Up Record</h5>
                            <div class="col-auto mt-2">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Search">
                                </div>
                            </div>
                            <div class="left-timeline mt-3 mb-3 pl-4">
                                <ul class="list-unstyled events mb-0">
                                    @foreach ($patientRecord as $record)
                                        <li class="event-list">
                                            <div class="pb-4">
                                                <div class="media">
                                                    <div class="event-date text-center mr-4">
                                                        <div
                                                            class="bg-soft-primary p-1 rounded text-primary font-size-14">
                                                            {{ \Carbon\Carbon::parse($record->created_at)->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="font-size-15 mt-0 mb-1"> {{ $record->Doctor->name }}
                                                        </h6>
                                                        <p class="text-muted font-size-14">Shreyu Admin - A
                                                            responsive admin and dashboard template</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    {{$patientRecord->links()}}
                                </ul>
                            </div>

                        </div>




                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
</div>
