import React from "react";
import { Box, TextField } from "@mui/material";
import { useStyle } from "./styles";
import './styles';

const TextBox = () => {
    const classes = useStyle();
    const [value, setValue] = React.useState('Controlled');

    const handleChange = (event) => {
        setValue(event.target.value);
    };
    return(
        <Box
            component="form"
            sx={{
                '& .MuiTextField-root': { m: 1, width: "450px" },
            }}
            noValidate
            autoComplete="off"
        >
            <TextField
                id="outlined-multiline-flexible"
                label="Idea"
                multiline
                maxRows={7}
                rows={7}
                defaultValue="Input idea..."
                value={value}
                onChange={handleChange}
                className = {classes.textField}
                />
        </Box>
    );
}

export default TextBox;