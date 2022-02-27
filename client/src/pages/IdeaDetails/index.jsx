import React from "react";
import './styles';
import { Grid} from "@mui/material";
import 'bootstrap/dist/css/bootstrap.min.css';
import Details from "./details";
import { Header } from "../../components/landing";

const IdeaDetailsPage = () => {
    return(
        <Grid container>
            <header className="navbar navbar-expand-lg fixed-top">
                <Header></Header>
            </header>
            <Grid>
                <Details></Details>
            </Grid>
        </Grid>
    );
}

export default IdeaDetailsPage;