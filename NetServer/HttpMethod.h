#ifndef __HTTPMETHOD_H_
#define __HTTPMETHOD_H_
#include "HttpStruct.h"
#include <string>
void HttpMethodGet(const HttpRequestContext &, std::string &, std::string);
void HttpMethodPost(const HttpRequestContext  &, std::string &, std::string);
void readFile(std::string path, std::string &responsecontext);
void execCGI(std::string args, std::string &responsecontext, std::string path);
std::string UrlDecode(std::string str);

#endif /* __HTTPMETHOD_H_ */
