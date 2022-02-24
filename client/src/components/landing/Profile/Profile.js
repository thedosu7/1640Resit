import React from 'react';
import './Profile.css';
import 'bootstrap/dist/css/bootstrap.min.css';

export default function Profile()
{
    return(
    <>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-5 py-7">
                <img rounded-circle mt-5 width="200px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"/>
                <span class="font-weight-bold">Username</span>
                <span class="text-black-50">username@gmail.com</span>
                <span class="badge bg-info text-wrap fs-6">Position: Staff</span>
            </div>
        </div>
        <div class="col-md border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-success fs-3">--- User's Profile ---</h4>
                </div>
                <div class="row mt-3">
                <div class="col-md-12"><label class="labels fw-bold">Full name:</label><input type="text" class="form-control" placeholder="Fullname" value="Vo Thanh Nhan"/></div>
                    <div class="col-md-12"><label class="labels fw-bold">Email:</label><input type="text" class="form-control" value="" placeholder="nhanvt@gmail.com"/></div>
                    <div class="col-md-12"><label class="labels fw-bold">Mobile Number:</label><input type="text" class="form-control" placeholder="Phone number" value=""/></div>
                    <div class="col-md-12"><label class="labels fw-bold">Birthday:</label><input type="text" class="form-control" placeholder="Birthday" value=""/></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels fw-bold">Password:</label><input type="text" class="form-control" placeholder="Password" value=""/></div>
                    <div class="col-md-6"><label class="labels fw-bold">New password:</label><input type="text" class="form-control" value="" placeholder="New password"/></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        </div>
        </div>
    </>
    )
}