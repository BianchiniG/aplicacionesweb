import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Activity } from './activity.model';

@Injectable({
  providedIn: 'root'
})
export class DataService {
  /* apiUrl = 'http://localhost:9090/api/activity'; */
  apiUrl = 'https://jsonplaceholder.typicode.com/users';

  constructor(private http: HttpClient) { }

  getActivities() {
    /* return this.http.get<Activity[]>(this.apiUrl); */
    return this.http.get<any[]>(this.apiUrl);
  }
}
