import React from "react";
import { Grid, Box, Button, Checkbox, FormControlLabel, Input, Stack, Paper, Divider, Typography} from "@mui/material";
import { useStyle } from "./styles";
import Title from './title';
import TextBox from "./textBox";
import SelectForm from "./select";
import { styled } from '@mui/material/styles';
import 'bootstrap/dist/css/bootstrap.min.css';

const Details = () => {
    const classes = useStyle();
    const [checked, setChecked] = React.useState(true);
    const handleChange = (event) => {
        setChecked(event.target.checked);
    };
    const Item = styled(Paper)(({ theme }) => ({
        backgroundColor: theme.palette.mode === 'dark' ? '#1A2027' : '#fff',
        ...theme.typography.body2,
        padding: theme.spacing(1),
        textAlign: 'center',
        color: theme.palette.text.secondary,
      }));
    return(
        <Box className= "justify-content-center">
                <Box className={classes.form}>
                    <Title></Title>
                    <TextBox></TextBox>
                    <br></br>
                    <Divider variant="middle" />
                    <br></br>
                    <Stack sx={{width: "450px"}}>
                        <label htmlFor="select-category" className={classes.label}>
                            <Typography variant="subtitle1" color="textSecondary">Select category:</Typography>
                            <SelectForm id="select-category"/>
                        </label>
                    </Stack>
                    <Stack sx={{width: "450px"}}>
                        <label htmlFor="contained-button-file" className={classes.label}>          
                            <Typography variant="subtitle1" color="textSecondary">Input file:</Typography> 
                            <Input accept="file_extension" id="contained-button-file" multiple type="file" className={classes.inputFile}></Input>
                        </label>
                    </Stack>
                    <Stack>
                    <Typography variant="subtitle1" color="#dc3545">
                        <FormControlLabel control={
                            <Checkbox checked={checked} onChange={handleChange} inputProps={{ 'aria-label': 'controlled' }}/>}
                            label="I agree with all terms and conditions*" className={classes.labelItalic}>
                        </FormControlLabel>
                    </Typography>
                    </Stack>
                    <Button variant="contained" component="span">Post idea</Button>
                </Box>
            </Box>
    );
}

export default Details;