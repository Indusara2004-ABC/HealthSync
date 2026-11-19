
@extends('layouts.app')

@section('content')

<div class="container">

    
<div class="directory-banner">

    <div class="banner-text">
        <h2>Healthcare Specialist Directory</h2>
        <p>
            Browse doctor profiles, specialties,
            consultation fees, and schedules.
        </p>
    </div>

    <button type="button" class="btn-add" id="openDoctorModalBtn">
        <i class="fa-solid fa-plus"></i>
        Add New Doctor
    </button>

</div>


    <div class="doctor-cards">

        @foreach($doctors as $doctor)

            <div class="doctor-card">

                <span class="doctor-specialization">
                    {{ $doctor->specialization }}
                </span>

                <h3>{{ $doctor->name }}</h3>

                <div class="doctor-details">
                    <strong>
                        Fee: LKR {{ number_format($doctor->fee) }}
                    </strong>

                    <span>
                        {{ $doctor->available_days }}
                    </span>
                </div>

                <div class="doctor-actions">

                    <button type="button"
                            class="btn-edit-doctor"
                            data-id="{{ $doctor->id }}"
                            data-name="{{ $doctor->name }}"
                            data-specialization="{{ $doctor->specialization }}"
                            data-fee="{{ $doctor->fee }}"
                            data-days="{{ $doctor->available_days }}">

                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit Doctor

                    </button>


                        <form action="{{ route('doctors.destroy', $doctor->id) }}"
                            method="POST"
                            class="delete-doctor-form">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-delete-doctor">
                                <i class="fa-solid fa-trash"></i>
                                Delete
                            </button>

                        </form>


                </div>

            </div>

        @endforeach

    </div>

</div>

<style>
    .doctor-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .doctor-card {
        background: white;
        padding: 25px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .doctor-specialization {
        display: inline-block;
        background: #eafaf6;
        color: #009688;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }

    .doctor-card h3 {
        margin: 22px 0;
        color: #1e293b;
    }

    .doctor-details {
        border-top: 1px solid #e2e8f0;
        padding-top: 15px;
        display: flex;
        justify-content: space-between;
        gap: 12px;
        font-size: 13px;
    }


    .doctor-actions {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #e2e8f0;
    }

    .btn-edit-doctor {
        background-color: #eff6ff;
        color: #2563eb;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-edit-doctor:hover {
        background-color: #dbeafe;
    }


    .doctor-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-delete-doctor {
        background-color: #fef2f2;
        color: #dc2626;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-delete-doctor:hover {
        background-color: #fee2e2;
    }



    @media (max-width: 900px) {
        .doctor-cards {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .doctor-cards {
            grid-template-columns: 1fr;
        }
    }
</style>


<!-- Add Doctor Modal -->
<div class="modal-overlay" id="addDoctorModal">

    <div class="modal-card">

        <div class="modal-header">
            <h3>Add New Doctor</h3>

            <button type="button"
                    class="modal-close"
                    id="closeDoctorModalBtn">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        
<form id="addDoctorForm" action="{{ route('doctors.store') }}" method="POST">
    @csrf


            <div class="form-group">
                <label>Doctor Name</label>
                <input type="text"
                       name="name"
                       placeholder="Dr. John Perera"
                       required>
            </div>

            <div class="form-group">
                <label>Specialization</label>
                <input type="text"
                       name="specialization"
                       placeholder="Cardiologist"
                       required>
            </div>

            <div class="form-group">
                <label>Consultation Fee (LKR)</label>
                <input type="number"
                       name="fee"
                       min="0"
                       placeholder="4500"
                       required>
            </div>

            <div class="form-group">
                <label>Available Days</label>
                <input type="text"
                       name="available_days"
                       placeholder="Mon, Wed, Fri"
                       required>
            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn-cancel"
                        id="cancelDoctorModalBtn">
                    Cancel
                </button>

                <button type="submit" class="btn-save">
                    Save Doctor
                </button>

            </div>

        </form>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const openBtn = document.getElementById('openDoctorModalBtn');
    const modal = document.getElementById('addDoctorModal');
    const closeBtn = document.getElementById('closeDoctorModalBtn');
    const cancelBtn = document.getElementById('cancelDoctorModalBtn');

    // Open popup
    openBtn.addEventListener('click', function () {
        modal.classList.add('active');
    });

    // Close popup
    closeBtn.addEventListener('click', function () {
        modal.classList.remove('active');
    });

    // Cancel popup
    cancelBtn.addEventListener('click', function () {
        modal.classList.remove('active');
    });


    // Edit Doctor Popup
    const editModal = document.getElementById('editDoctorModal');
    const editForm = document.getElementById('editDoctorForm');

    const editButtons = document.querySelectorAll('.btn-edit-doctor');

    editButtons.forEach(function(button) {

        button.addEventListener('click', function() {

            const id = button.dataset.id;

            document.getElementById('editDoctorName').value =
                button.dataset.name;

            document.getElementById('editDoctorSpecialization').value =
                button.dataset.specialization;

            document.getElementById('editDoctorFee').value =
                button.dataset.fee;

            document.getElementById('editDoctorDays').value =
                button.dataset.days;

            editForm.action = '/doctors/' + id;

            editModal.classList.add('active');
        });

    });

    document.getElementById('closeEditDoctorBtn')
        .addEventListener('click', function() {
            editModal.classList.remove('active');
        });

    document.getElementById('cancelEditDoctorBtn')
        .addEventListener('click', function() {
            editModal.classList.remove('active');
        });


    // Delete Doctor Confirmation
    const deleteForms = document.querySelectorAll('.delete-doctor-form');

    deleteForms.forEach(function(form) {
        form.addEventListener('submit', function(event) {

            const confirmed = confirm(
                'Are you sure you want to delete this doctor?'
            );

            if (!confirmed) {
                event.preventDefault();
            }

        });
    });



});
</script>


<!-- Edit Doctor Modal -->
<div class="modal-overlay" id="editDoctorModal">

    <div class="modal-card">

        <div class="modal-header">
            <h3>Edit Doctor</h3>

            <button type="button"
                    class="modal-close"
                    id="closeEditDoctorBtn">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="editDoctorForm" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Doctor Name</label>
                <input type="text"
                       id="editDoctorName"
                       name="name"
                       required>
            </div>

            <div class="form-group">
                <label>Specialization</label>
                <input type="text"
                       id="editDoctorSpecialization"
                       name="specialization"
                       required>
            </div>

            <div class="form-group">
                <label>Consultation Fee (LKR)</label>
                <input type="number"
                       id="editDoctorFee"
                       name="fee"
                       min="0"
                       required>
            </div>

            <div class="form-group">
                <label>Available Days</label>
                <input type="text"
                       id="editDoctorDays"
                       name="available_days"
                       required>
            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn-cancel"
                        id="cancelEditDoctorBtn">
                    Cancel
                </button>

                <button type="submit" class="btn-save">
                    Update Doctor
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
