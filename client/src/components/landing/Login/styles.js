import { makeStyles } from "@mui/styles";

export const useStyles = makeStyles(() => ({
  form: {
    marginTop: "80px",
    display: "flex",
    flexDirection: "column",
  },

  textfield: {
    margin: "10px 0 !important",
  },

  titleForm: {
    marginTop: "40px",
    fontSize: "30px",
    textTransform: "uppercase",
    color: "#2d3791 !important"
  },

  buttonLogin: {
    backgroundColor: "#2d3791 !important",
    border: 0,
    height: 48,
    padding: '0 30px',
    fontWeight: "600 !important",
    color: "white !important"
  },

  loginForm: {
    padding: "20px 50px"
  },

  logo: {
    height: "150px",
    margin: "auto"
  }
}));
