import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ActivityService {
  apiUrl = 'http://localhost:9090/api/activity';

  constructor(private http: HttpClient) { }

  getActivity(id:any) {
    return this.http.get<any[]>(this.apiUrl+"/"+id);
  }
}
