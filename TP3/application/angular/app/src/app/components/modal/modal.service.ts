import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ModalService {
  apiUrl = 'http://localhost:9090/api/activity';

  constructor(private http: HttpClient) { }

  getActivity(id:any) {
    return 1;
    // return this.http.get<any[]>(this.apiUrl+"/"+id);
  }
}
