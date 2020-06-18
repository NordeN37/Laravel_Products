<template>
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="">
            Корзина ({{ $store.state.cartCount }})
        </a>

        <div v-if="$store.state.cart.length > 0" class="navbar-dropdown is-boxed is-right">
            <a v-for="item in $store.state.cart"
               :key="item.id"
               class="navbar-item"
               href=""
            >
    <span class="removeBtn"
          title="Удалить из корзины"
          @click.prevent="removeFromCart(item)">X</span>

                {{ item.title }} x{{ item.quantity }} - ${{ item.totalPrice }}
            </a>

            <a class="navbar-item" href="">
                Итого: ${{ totalPrice }}
            </a>

            <hr class="navbar-divider">

            <a class="navbar-item" href="">
                К оплате
            </a>
        </div>

        <div v-else class="navbar-dropdown is-boxed is-right">
            <a class="navbar-item" href="">
                Корзина пуста
            </a>
        </div>
    </div>
</template>
<script>
    export default {
        computed: {
            totalPrice() {
                let total = 0;

                for (let item of this.$store.state.cart) {
                    total += item.totalPrice;
                }

                return total.toFixed(2);
            }
        },
        methods: {
            removeFromCart(item) {
                this.$store.commit('removeFromCart', item);
                this.$store.commit('saveCart');
            }
        }
    }
</script>
<style>
    .removeBtn {
        margin-right: 1rem;
        color: red;
    }
</style>
