import axios from 'axios';
import { ToggleWishlist } from '../types/ToggleWishlist';


const toggleWishlist = (
    gameId: number,
    userId: number,
    onWishlist: boolean
): void => {
    axios.post<ToggleWishlist>('http://localhost/api/wishlist', {
        game_id: gameId,
        user_id: userId,
        on_wishlist: onWishlist
    }).then(resp => {
        // do stuff with response when we get it
        if (resp.status === 200) {
            const msg = resp.data.on_wishlist ? 'Game added to your wishlist!'
                : 'Game removed from your wishlist';
            alert(msg);
        }
    });
}

export default {
    toggleWishlist
}
