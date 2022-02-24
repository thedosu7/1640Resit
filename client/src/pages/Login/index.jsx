import Grid from "@mui/material/Grid";
import React from "react";
import { useStyle } from "./styles";
import { Login } from "../../components/landing";
import coverImage from "../../assets/images/bg-login.jpg";

const LoginPage = (_) => {
  const classes = useStyle();
  return (
    <Grid className={classes.parentContainer} container spacing={0}>
      <Grid item md={8}>
        <img className={classes.coverImage} src={coverImage} alt="" />
      </Grid>
      <Grid item md={4} xs={12}>
        <div >
          <Login />
        </div>
      </Grid>
    </Grid>
  );
};

export default LoginPage;
