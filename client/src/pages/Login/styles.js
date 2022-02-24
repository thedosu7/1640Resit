import { makeStyles } from "@mui/styles";

export const useStyle = makeStyles((theme) => ({
  parentContainer: {
    height: "100vh",
  },

  coverImage: {
    height: "100%",
    width: "100%",
    objectFit: "cover"
  },

  container: {
    display: "flex",
    flexDirection: "column",
    justifyContent: "center",
    height: "100%"
  }
}))