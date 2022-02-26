import React from 'react';
import Grid from "@mui/material/Grid";
import './styles';
import { useStyle } from "./styles";
import { TextField, Box, Typography } from '@mui/material';
import 'bootstrap/dist/css/bootstrap.min.css';

const ProfilePage = (_) => {
    const classes = useStyle();
    return(
        <Grid container>
            <Grid xs={4} className={classes.picture}>
                <img rounded-circle mt-5 width="200px" src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'/>
                <Grid className="font-weight-bold">Username</Grid>
                <Grid className="text-black-50">username@gmail.com</Grid>
                <Grid className="badge bg-info text-wrap fs-6">Posisition: Staff</Grid>
            </Grid>
            <Grid xs={7} className={classes.profile}>
                <h4 className="text-success fs-3">User's Profile</h4>
                <Grid className="row mt-3">
                    <Typography className="labels fw-bold float-left" sx={{mr: 12, mb: 2}}></Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Full name" label="Full name"></TextField>
                    <Typography className="labels fw-bold" sx={{mr: 12, mb: 2}}></Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Email" label="Email"></TextField>
                    <Typography className="labels fw-bold" sx={{mr: 12, mb: 2}}></Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Mobile number" label="Mobile number"></TextField>
                    <Typography className="labels fw-bold" sx={{mr: 12, mb: 2}}></Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Date of birth" label="Date of birth"></TextField>
                    <Typography className="labels fw-bold" sx={{mr: 12, mb: 2}}></Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Address" label="Address"></TextField>
                <Grid className="mt-5 text-center"><button className={classes.profileButton} type="button">Save profile</button></Grid>
            </Grid>
        </Grid>
    </Grid>
    )

    /**
     * <Typography className="labels fw-bold float-left" sx={{mr: 12, mb: 2}}> Full name: </Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Full name" label="Full name"></TextField>
                    <Typography className="labels fw-bold" sx={{mr: 12, mb: 2}}> Email: </Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Email" label="Email"></TextField>
                    <Typography className="labels fw-bold" sx={{mr: 12, mb: 2}}> Mobile number: </Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Mobile number" label="Mobile number"></TextField>
                    <Typography className="labels fw-bold" sx={{mr: 12, mb: 2}}> Date of birth: </Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Date of birth" label="Date of birth"></TextField>
                    <Typography className="labels fw-bold" sx={{mr: 12, mb: 2}}> Address: </Typography>
                    <TextField fullWidth type="text" className="formControl" placeholder="Address" label="Address"></TextField>
     */
}

export default ProfilePage;