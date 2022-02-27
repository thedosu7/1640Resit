import React from "react";
import { FormControl, InputLabel, Select, MenuItem } from "@mui/material";
import { useStyle } from "./styles";

const SelectForm = () => {
    const classes = useStyle();
    const [category, setCategory] = React.useState('');
    const handleChange = (event) => {
        setCategory(event.target.value);
      };
    return(
        <FormControl required className={classes.selectForm}>
            <InputLabel id="demo-simple-select-required-label">Category</InputLabel>
            <Select
                labelId="demo-simple-select-required-label"
                id="demo-simple-select-required"
                value={category}
                onChange={handleChange}
            >
            <MenuItem value="">
            </MenuItem>
                <MenuItem value={1}>Category 1</MenuItem>
                <MenuItem value={2}>Category 2</MenuItem>
                <MenuItem value={3}>Category 3</MenuItem>
            </Select>
        </FormControl>
    );
}

export default SelectForm;

