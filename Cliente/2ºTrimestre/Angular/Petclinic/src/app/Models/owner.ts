import { Pet } from "./pet";

export interface Owner {
    id : Number,
    firstName : String,
    lastName : String,
    address : String,
    city : String,
    pets : Pet[],
    telephone : String
}
