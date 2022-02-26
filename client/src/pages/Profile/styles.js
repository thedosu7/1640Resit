import { makeStyles } from '@mui/styles';

export const useStyle = makeStyles((theme) => ({
    parentContainer: {
        height: "100vh",
        position: "Absolute",
    },

    formControl: {
        boxShadow: 'none',
        borderColor: '#BA68C8'
    },

    profileButton: {
        backgroundColor: "#2d3791 !important",
        border: 0,
        height: 48,
        padding: '0 30px',
        fontWeight: "600 !important",
        color: "white !important",
    },

    label: {
        fontSize: "11px",
    },

    textFont: {
        fontFamily: 'BlinkMacSystemFont',
    },

    profile: {
        marginTop: "40px",
    }, 

    picture: {
        marginTop: "20px",
    }

}))