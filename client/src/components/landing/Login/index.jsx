import React from "react";
import { Box, Button, TextField } from "@mui/material";
import { useStyles } from "./styles";
import image from "../../../assets/images/icon.png";

const Login = () => {
  const classes = useStyles();
  return (
    <div className={classes.loginForm}>
      <Box
        component="form"
        className={classes.form}
      >
        <img src={image} alt="" className={classes.logo} />
        <h1 className={classes.titleForm}>Login</h1>
        <TextField
          className={classes.textfield}
          id="outlined-required"
          label="Email"
          name="email"
        />
        <TextField
          className={classes.textfield}
          id="outlined-password-input"
          label="Password"
          type="password"
          name="password"
          autoComplete="current-password"
        />
        <Button
          type="submit"
          className={`${classes.buttonLogin} ${classes.textfield}`}
        >
          Login
        </Button>
      </Box>
    </div>
  );
};

export default Login;
