import axios from 'axios';
import { Alpine } from '../../bootstrap';
import { ToggleWishlist } from '../types/ToggleWishlist';


interface GameProps {
    userId: number;
    gameId: number;
    onWishlist: boolean;
}
interface Game extends GameProps {
    setGameInfo: (gameId: number, userId: number, onWishlist: boolean) => void;
    toggleWishlist: GameProps & { "@click"(): void };
    getButtonText: () => string;
}

const initWishlistButtons = () => {
    document.addEventListener('alpine:init', () => {
        Alpine.data('game', () => ({
            setGameInfo(gameId: number, userId: number, onWishlist: boolean): void {
                this.gameId = gameId;
                this.userId = userId;
                this.onWishlist = onWishlist;
            },
            getButtonText(): string {
                return this.onWishlist ? 'Remove from wishlist' : 'Add to wishlist';
            },
            toggleWishlist: {
                ['@click']() {
                    axios.post<ToggleWishlist>('http://localhost/api/wishlist', {
                        game_id: this.gameId,
                        user_id: this.userId,
                        on_wishlist: this.onWishlist
                    }).then(({status, data}) => {
                        // do stuff with response when we get it
                        if (status === 200) {
                            this.onWishlist = data.on_wishlist;
                        } else {
                            const msg = this.onWishlist
                                ? 'Problem removing game from your wishlist :('
                                : 'Problem adding game to your wishlist :(';
                            alert(msg);
                        }
                    });
                }
            }
        } as Game));
    });
}

export default {
    initWishlistButtons
}
