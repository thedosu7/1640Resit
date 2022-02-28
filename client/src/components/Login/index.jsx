import React, { useState } from "react";
import { Box, Button, TextField } from "@mui/material";
import { useStyles } from "./styles";
import image from "../../assets/images/icon.png";
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

const Login = () => {
  const classes = useStyles();
  const navigate = useNavigate();

  const [loginInput, setLogin] = useState({
    email: '',
    password: '',
    error_list: [],
  })

  const handleInput = (e) => {
    const { name, value } = e.target;
    setLogin(inputs => ({ ...inputs, [name]: value }));
  }

  const handleSubmit = (e) => {
    e.preventDefault();

    const data = {
      email: loginInput.email,
      password: loginInput.password,
    }
    
    axios.get('/sanctum/csrf-cookie').then((response) => {
      axios.post('/api/login', data).then(res => {
        if(res.data.status === 200){
          localStorage.setItem('token',res.data.token);
          localStorage.setItem('user',res.data.user);
          navigate( "/profile" )
        }else if(res.data.status === 400){
          alert(res.data.message);
        }else{
          setLogin({...loginInput, error_list: res.data.validation_errors});
        }
      });
    });

  }


  return (
    <div className={classes.loginForm}>
      <Box
        component="form"
        className={classes.form}
        onSubmit={handleSubmit}
      >
        <img src={image} alt="" className={classes.logo} />
        <h1 className={classes.titleForm}>Login</h1>
        <TextField
          className={classes.textfield}
          id="outlined-required"
          label="Email"
          name="email"
          onChange={handleInput}
          value={loginInput.email}
        />
        {/* <span>{loginInput.error_list.email}</span> */}
        <TextField
          className={classes.textfield}
          id="outlined-password-input"
          label="Password"
          type="password"
          name="password"
          autoComplete="current-password"
          onChange={handleInput}
          value={loginInput.password}
        />
        {/* <span>{loginInput.error_list.password}</span> */}
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
