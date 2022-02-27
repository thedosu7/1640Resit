import React from "react";
import { Stack, Avatar, TextField, Box } from "@mui/material";
import { useStyle } from "./styles";

const Title = () => {
    const classes = useStyle();
    return (
        <Stack direction="row" spacing={1}>
            <Avatar alt="Remy Sharp" src="" sx={{ width: 40, height: 40}}/>
            <Box
                component="form"
                sx={{
                    '& > :not(style)': { m: 1, width: '400px' },
                }}
                noValidate
                autoComplete="off"
            >
                <TextField id="outlined-basic" label="Title" className={classes.textField}/>
            </Box>
        </Stack>
    );
}

export default Title;