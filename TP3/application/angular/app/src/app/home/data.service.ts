import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Activity } from './activity.model';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class DataService {
  apiUrl = 'http://localhost:9090/api/activity';

  constructor(private http: HttpClient) { }

  getActivities() {
    return this.http.get<any[]>(this.apiUrl);
  }
}
