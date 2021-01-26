import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class PAjaxService {

  constructor(private httpClient: HttpClient) { }

  changePage(url : string){
    return this.httpClient.get<any>(url);
 }

}