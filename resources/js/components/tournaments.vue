<template>
    <div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tournament">Tournament</label>
                                        <input
                                            class="form-control form-control-lg"
                                            type="text"
                                            name="tournament"
                                            placeholder="Enter match title"
                                            v-model="title"
                                        />

                                    </div>

                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="rounds">Number of players</label>
                                        <input
                                            class="form-control form-control-lg"
                                            type="number"
                                            name="number_of_players"
                                            placeholder="Enter number of players"
                                            v-model.number="number_of_players"
                                        />
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="rules">Rules</label>
                                        <input
                                            class="form-control form-control-lg"
                                            type="text"
                                            name="rules"
                                            placeholder="Enter rules"
                                            v-model="rules"
                                        />
                                    </div>

                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="type"> Click here </label>
                                        <button id="add"
                                                class="btn btn-lg btn-primary form-control form-control-lg" @click="create_player_fields">CREATE
                                        </button>
                                    </div>


                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="render_player_fields" v-for="i in number_of_players">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="form-label" for="type"> </label>
                                    <button class="btn btn-lg btn-secondary form-control form-control-lg">MATCH 1
                                    </button>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label class="form-label" for="players"> Player 1 </label>
                                    <select name="player_1[]" v-model="player1[i-1]" :id="'player1_' + i"
                                            class="form-control form-select custom-select select2"
                                            data-toggle="select2">
                                        <option :value="player.id" v-for="player in all_players">  {{ player.name }} </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label class="form-label" for="players"> Player 2 </label>
                                    <select name="player_2[]" v-model="player2[i-1]" :id="'player2_' + i"
                                            class="form-control form-select custom-select select2"
                                            data-toggle="select2">

                                        <option :value="player.id" v-for="player in all_players">  {{ player.name }} </option>


                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="render_player_fields">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-lg btn-primary" @click="create_tournament"> Add Tournament </button>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
export default {
    data: function () {
        return {
            title: '',
            number_of_players: 0,
            rules: 0,
            render_player_fields: false,
            player1: [] ,
            player2: [] ,
            all_players: [] ,
        }
    },

    mounted() {
        this.fetch_players();
        // window.setInterval(() => {
        //     this.fetch_players()
        // }, 3 * 1000);
    },

    methods: {
        fetch_players() {
            var URL = '/api/players';
            axios.get(URL)
                .then((response) => {
                    this.all_players = response.data;
                });

        },

        create_tournament() {

            axios.post('/tournaments/create', {
                title: this.title,
                number_of_players: this.number_of_players,
                rules: this.rules,
                player1: this.player1,
                player2: this.player2,
            })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });

        },

        create_player_fields() {
            this.render_player_fields = true;
        },

        open_detail_page(id) {
            console.log(id);
            window.open('/scores/' + id, '_blank');
        },
    },
    computed: {

        getClassName() {
            return i => {
                if(i > 0) return 'bold_weight_700';
            }
        }
    },
}
</script>

<style scoped>
.bold_weight_700 {
    font-weight: 700;
}
</style>

