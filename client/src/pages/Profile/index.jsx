import React from 'react';
import './styles';
import { useStyle } from "./styles";
import { TextField, Grid, Container, Button, Box } from '@mui/material';

const ProfilePage = (_) => {
    const classes = useStyle();
    return (
        <Container maxWidth="xl">
            <Grid container>
                <Grid xs={3} className={classes.picture}>
                    <img className="rounded-circle mt-5" width="200px" src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg' />
                    <p className="font-weight-bold">Hi, Username</p>
                    <p className="text-black-50">username@gmail.com</p>
                    <p className="badge bg-success text-wrap fs-6">Role: Staff</p>
                </Grid>
                <Grid xs={8} className={classes.profile}>
                    <h4>Profile</h4>
                    <Box component="form" className={classes.form}>
                        <TextField className={classes.textfield} type="text" placeholder="Full name" label="Full name"/>
                        <TextField className={classes.textfield} type="text" placeholder="Email" label="Email"/>
                        <TextField className={classes.textfield} type="text" placeholder="Mobile number" label="Mobile number"/>
                        <TextField className={classes.textfield} type="text" placeholder="Date of birth" label="Date of birth"/>
                        <TextField className={classes.textfield} type="text" placeholder="Address" label="Address"/>
                        <Button className={classes.profileButton}>Save profile</Button>
                    </Box>
                </Grid>
            </Grid>
        </Container>

    )
}

export default ProfilePage;