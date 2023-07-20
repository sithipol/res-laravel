<template>
    <div class="bg-white">
        <div class="absolute inset-x-0 top-0 z-50">
            <div
                class="flex items-center justify-between p-6 lg:px-8"
                aria-label="Global"
            >
                <div class="flex mx-auto">
                    <input
                        type="text"
                        name="price"
                        id="price"
                        class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Bangsue"
                        :value="defaultValue"
                    />
                </div>
            </div>
        </div>

        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="mx-auto py-32 sm:py-24 lg:py-28">
                <GoogleMap
                    api-key="AIzaSyAoCoVAEYsFYD5QSK0u7E_YO5zOR5toNpY"
                    style="width: 100%; height: 500px"
                    :center="center"
                    :zoom="15"
                >
                    <Marker :options="{ position: center }" />
                </GoogleMap>
            </div>
            <!-- <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true"
            >
                <div
                    class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div> -->
        </div>
    </div>
</template>
<script>
import { GoogleMap, Marker } from "vue3-google-map";
import axios from "axios";
const API_URL = "http://restaurant.test/api/search-restaurant";
export default {
    components: { GoogleMap, Marker },
    data() {
        return {
            center: { lat: 13.8185376, lng: 100.5292056 },
            defaultValue: "Bangsue",
        };
    },
    created() {
        // load map default on init
        // this.setupDefaultMap();
    },
    // // watch: {

    // // },
    methods: {
        async setupDefaultMap() {
            axios
                .post(API_URL, { place: "restautants in BangSue" })
                .then((result) => {
                    let data = result.data.results;
                    let count = 0;
                    data.forEach((element) => {
                        if (count == 3) {
                            this.center = element.geometry.location;
                        }
                        count++;
                    });
                    //
                    // console.log(data);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
<style scoped></style>
