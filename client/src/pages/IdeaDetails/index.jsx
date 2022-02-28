import React from "react";
import './styles';
import { Grid} from "@mui/material";
import 'bootstrap/dist/css/bootstrap.min.css';
import Details from "./details";

const IdeaDetailsPage = () => {
    return(
        <Grid container>
            <Grid>
                <Details></Details>
            </Grid>
        </Grid>
    );
}

export default IdeaDetailsPage;