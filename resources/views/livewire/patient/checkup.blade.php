<div class="wrapper">
    <style>
        .img-wrap {
            position: relative;
            ...
        }

        .img-wrap .close {
            position: absolute;
            bottom: 10px;
            z-index: 10;
            color: maroon;
        }
    </style>
    <form wire:submit.prevent='{{ $action }}'>
        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="patient_id">Patient ID</label>
                            <input type="text" class="form-control" id="patient_id" readonly
                                value="{{ $patientDetails->id }}">
                        </div>
                        <div class="form-group">
                            <label for="patient_id">Patient Name</label>
                            <input type="text" class="form-control" id="patient_id" readonly
                                value="{{ $patientDetails->name }}">
                        </div>
                        <div class="form-group">
                            <label for="patient_id">Current Doctor</label>
                            <select class="custom-select mb-2 text-capitalize" wire:model.lazy='doctor_id'>
                                <option selected="">Open this select menu</option>
                                @if ($doctors)
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('doctor_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="symptoms">Symptoms</label>
                            <textarea class="form-control" rows="5" id="example-textarea" wire:model.lazy='symptoms'></textarea>
                            @error('symptoms')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea class="form-control" rows="5" id="example-textarea" wire:model.lazy='remarks'></textarea>
                        </div>
                        <div class="form-group">
                            <label for="findings">Findings</label>
                            <textarea class="form-control" rows="5" id="example-textarea" wire:model.lazy='findings'></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="patient_id">Upload Image</label>
                            <input type="file" class="form-control" id="example-fileinput" wire:model="photos"
                                multiple>
                            @error('photos')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>

                        @if ($images)
                            @foreach ($images as $image)
                                {{-- <img src="{{ $image->temporaryUrl()}} " class="img-thumbnail"/> --}}
                                {{-- <img src="{{ asset('storage/' . $image) }}" alt="$images" class="img-thumbnail"> --}}
                                <div class="img-wrap">
                                    {{-- <span class="close"><i class="fa-solid fa-trash"></i></span> --}}
                                    <button type="submit" class=" close btn btn-block btn--md btn-light">Remove Image</button>

                                    <img src="{{ asset('storage/' . $image) }} " class="img-thumbnail" />
                                </div>
                            @endforeach
                        @endif
                        <br>
                        <button type="submit" class="btn btn-block btn--md btn-primary">Save Changes</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
