import { makeStyles } from '@mui/styles';

export const useStyle = makeStyles((theme) => ({

    form: {
        display: "flex",
        flexDirection: "column",
    },

    textfield: {
        margin: "10px 0 !important",
    },

    profileButton: {
        backgroundColor: "#2d3791 !important",
        border: 0,
        height: 48,
        padding: '0 30px',
        fontWeight: "600 !important",
        color: "white !important"
    },

    profile: {
        marginTop: "80px",
    },

    picture: {
        marginTop: "60px",
        textAlign: "center"
    },
}))