import { makeStyles } from "@mui/styles";

export const useStyle = makeStyles((theme) => ({
    logo: {
      height: "50px",
      margin: "auto"
    },
    Input: {
      display: 'none',
    },
    form: {
      width: 500, 
      height: 560, 
      backgroundColor: '#B8E2F2',
      borderRadius: 16,
      padding: "8px 7px",
      margin: "100px 200px",
    },
    textField: {
      backgroundColor: '#D8F9FF',
    },
    selectForm: {
      width: "310px",
      backgroundColor: '#D8F9FF',
    },
    inputFile: {
      width: "350px",
      margin: "20px"
    },
    label: {
      display: 'flex', 
      alignItems: 'left',
      marginLeft: "20px",
      fontFamily: "sans-serif",
      width: 500
    },
    labelItalic: {
      display: 'flex', 
      alignItems: 'left',
      marginLeft: "20px",
      fontFamily: "sans-serif",
      fontStyle: 'italic',
      width: 500
    }
}))